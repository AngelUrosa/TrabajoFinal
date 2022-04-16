package com.daw2.aprende.model.dao.impl;

import com.daw2.aprende.model.dao.ConectaBD;
import com.daw2.aprende.model.dao.UsuariosDao;
import com.daw2.aprende.model.entity.Usuario;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class UsuariosDaoImpl implements UsuariosDao {
    private Connection connection;
    private boolean error;
    private String nifAnterior;

    public UsuariosDaoImpl() {
        super();
        nifAnterior = "";
        error = false;
        try {
            connection = ConectaBD.getConnection();
        } catch (SQLException e) {
            error = true;
            System.out.println("Se ha producido un error al acceder a la BD.");
        }
    }

    @Override
    public Integer add(Usuario entity) {
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
    public boolean add(List<Usuario> list) {
        error = false;
        try {
            for (Usuario entity : list) {
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
    public boolean update(Usuario entity) {
        error = false;
        String sql = "UPDATE usuarios SET "
                + "nif=?, nombre=?, apellido1=?, apellido2=? "
                + "WHERE id=?";
        try (PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, entity.getNif());
            ps.setString(2, entity.getNombre());
            ps.setString(3, entity.getApellido1());
            ps.setString(4, entity.getApellido2());
            ps.setInt(5, entity.getId());
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
        String sql = "DELETE FROM usuarios "
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
            String sql = "DELETE FROM usuarios";
            PreparedStatement ps = connection.prepareStatement(sql);
            ps.executeUpdate();
            connection.commit();
        } catch (SQLException ex) {
            error = true;
        }
        return !error;
    }

    @Override
    public Usuario get(int id) {
        error = false;
        Usuario entity = null;
        String sql = "SELECT "
                + "id, nif, nombre, apellido1, apellido2 "
                + "FROM usuarios WHERE id = ?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                entity = new Usuario();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
            }
            rs.close();
        } catch (Exception ex) {
            error = true;
        }
        return entity;
    }

    @Override
    public List<Usuario> listAll() {
        error = false;
        Usuario entity = null;
        List<Usuario> list = new ArrayList<>();
        String sql = "SELECT "
                + "id, nif, nombre, apellido1, apellido2 "
                + "FROM usuarios "
                + "ORDER BY apellido1, apellido2, nombre";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                entity = new Usuario();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
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
    public List<Usuario> listNext(int rows) {
        List<Usuario> list = new ArrayList();
        Usuario entity;
        error = false;
        String sql = "SELECT id, "
                + "nif, nif, nombre, apellido1, apellido2 "
                + "FROM usuarios "
                + "WHERE    "
                + "nif > ? "
                + "ORDER BY nif ASC LIMIT ?";

        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setString(1, nifAnterior);
            ps.setInt(2, rows);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                entity = new Usuario();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
                list.add(entity);
            }
            rs.close();
            if (!list.isEmpty())
                nifAnterior = list.get(list.size() - 1).getNif();
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

    private Integer _add(Usuario entity) throws SQLException {
        Integer id;
        String sql = "INSERT INTO usuarios "
                + "(nif, nombre, apellido1, apellido2) VALUES "
                + "(?,?,?,?)";
        PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
        ps.setString(1, entity.getNif());
        ps.setString(2, entity.getNombre());
        ps.setString(3, entity.getApellido1());
        ps.setString(4, entity.getApellido2());
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

    @Override
    public Usuario getByNif(String nif) {
        error = false;
        Usuario entity = null;
        String sql = "SELECT "
                + "id, nif, nombre, apellido1, apellido2 "
                + "FROM usuarios WHERE nif = ?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setString(1, nif);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                entity = new Usuario();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
            }
            rs.close();
        } catch (Exception ex) {
            error = true;
        }
        return entity;
    }

}
