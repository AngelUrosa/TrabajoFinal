package com.daw2.aprende.model.dao.impl;

import com.daw2.aprende.model.dao.ConectaBD;
import com.daw2.aprende.model.dao.DepartamentosDao;
import com.daw2.aprende.model.entity.Departamento;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class DepartamentosDaoImpl implements DepartamentosDao {
    private Connection connection;
    private boolean error;
    private String dptoAnterior;

    public DepartamentosDaoImpl() {
        super();
        dptoAnterior = "";
        error = false;
        try {
            connection = ConectaBD.getConnection();
        } catch (SQLException e) {
            error = true;
            System.out.println("Se ha producido un error al acceder a la BD.");
        }
    }

    @Override
    public Integer add(Departamento entity) {
        Integer id = null;
        error = false;

        try {
            id = _add(entity);
            connection.commit();
        } catch (SQLException ex) {
            error = true;
            try {
                connection.rollback();
            } catch (SQLException ex1) {
            }
        }
        return id;
    }

    @Override
    public boolean add(List<Departamento> list) {
        error = false;
        try {
            for (Departamento entity : list) {
                _add(entity);
            }
            connection.commit();
        } catch (SQLException ex) {
            error = true;
            try {
                connection.rollback();
            } catch (SQLException ex1) {
            }
        }
        return !error;
    }

    @Override
    public boolean update(Departamento entity) {
        error = false;
        String sql = "UPDATE departamentos SET "
                + "cod_dpto=?, descripcion=? "
                + "WHERE id=?";
        try (PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, entity.getCodDpto());
            ps.setString(2, entity.getDescripcion());
            ps.setInt(3, entity.getId());
            ps.executeUpdate();
            connection.commit();
        } catch (SQLException ex) {
            error = true;
            try {
                connection.rollback();
            } catch (SQLException ex1) {
            }
        }
        return !error;
    }

    @Override
    public boolean delete(int id) {
        error = false;
        String sql = "DELETE FROM departamentos "
                + "WHERE id=?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setInt(1, id);
            ps.executeUpdate();
            connection.commit();
        } catch (SQLException ex) {
            error = true;
            try {
                connection.rollback();
            } catch (SQLException ex1) {
            }
        }
        return !error;
    }

    @Override
    public boolean deleteAll() {
        error = false;
        try {
            String sql = "DELETE FROM departamentos";
            PreparedStatement ps = connection.prepareStatement(sql);
            ps.executeUpdate();
            connection.commit();
        } catch (SQLException ex) {
            error = true;
        }
        return !error;
    }

    @Override
    public Departamento get(int id) {
        error = false;
        Departamento entity = null;
        String sql = "SELECT "
                + "id, cod_dpto, descripcion "
                + "FROM departamentos WHERE id = ?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                entity = new Departamento();
                entity.setId(rs.getInt("id"));
                entity.setCodDpto(rs.getString("cod_dpto"));
                entity.setDescripcion(rs.getString("descripcion"));
            }
            rs.close();
        } catch (Exception ex) {
            error = true;
        }
        return entity;
    }

    @Override
    public List<Departamento> listAll() {
        error = false;
        Departamento entity = null;
        List<Departamento> list = new ArrayList<>();
        String sql = "SELECT "
                + "id, cod_dpto, descripcion "
                + "FROM departamentos "
                + "ORDER BY cod_dpto";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                entity = new Departamento();
                entity.setId(rs.getInt("id"));
                entity.setCodDpto(rs.getString("cod_dpto"));
                entity.setDescripcion(rs.getString("descripcion"));
                list.add(entity);
            }
            rs.close();
        } catch (SQLException ex) {
            error = true;
            list = null;
        }
        return list;
    }

    @Override
    public List<Departamento> listNext(int rows) {
        List<Departamento> list = new ArrayList();
        Departamento entity;
        error = false;
        String sql = "SELECT id, "
                + "id, cod_dpto, descripcion "
                + "FROM departamentos "
                + "WHERE    "
                + "cod_dpto > ? "
                + "ORDER BY cod_dpto ASC LIMIT ?";

        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setString(1, dptoAnterior);
            ps.setInt(2, rows);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                entity = new Departamento();
                entity.setId(rs.getInt("id"));
                entity.setCodDpto(rs.getString("cod_dpto"));
                entity.setDescripcion(rs.getString("descripcion"));
                list.add(entity);
            }
            rs.close();
            if (!list.isEmpty())
                dptoAnterior = list.get(list.size() - 1).getCodDpto();
        } catch (SQLException ex) {
            error = true;
        }
        return list;
    }

    @Override
    public boolean isError() {
        return error;
    }

    /*--------------------*/
    /* Métodos auxiliares */
    /*--------------------*/

    private Integer _add(Departamento entity) throws SQLException {
        Integer id;
        String sql = "INSERT INTO departamentos "
                + "(cod_dpto, descripcion) VALUES "
                + "(?,?)";
        PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
        ps.setString(1, entity.getCodDpto());
        ps.setString(2, entity.getDescripcion());
        ps.executeUpdate();
        ResultSet rs = ps.getGeneratedKeys();
        if (rs.next()) {
            id = rs.getInt(1);
        } else {
            id = -1; // Si se ha añadido pero no se ha devuelto un id
        }

        return id;
    }

    /*-------------------------*/
    /* Métodos complementarios */
    /*-------------------------*/

}
