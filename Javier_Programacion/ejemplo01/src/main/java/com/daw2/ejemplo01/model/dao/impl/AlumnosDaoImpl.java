package com.daw2.ejemplo01.model.dao.impl;


import com.daw2.ejemplo01.model.dao.AlumnosDao;
import com.daw2.ejemplo01.model.dao.ConectaBD;
import com.daw2.ejemplo01.model.entity.Alumno;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class AlumnosDaoImpl implements AlumnosDao {
    private Connection connection;
    private boolean error;
    private String nifAnterior;

    public AlumnosDaoImpl() {
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
    public Integer add(Alumno entity) {
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
    public boolean add(List<Alumno> list) {
        error = false;
        try {
            for (Alumno entity : list) {
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
    public boolean update(Alumno entity) {
        error = false;
        String sql = "UPDATE alumnos SET "
                + "nif=?, nombre=?, apellido1=?, apellido2=?,pago=? "
                + "WHERE id=?";
        try (PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, entity.getNif());
            ps.setString(2, entity.getNombre());
            ps.setString(3, entity.getApellido1());
            ps.setString(4, entity.getApellido2());
            ps.setDouble(5, entity.getPago());
            ps.setInt(6, entity.getId());
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
        String sql = "DELETE FROM alumnos "
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
            String sql = "DELETE FROM alumnos";
            PreparedStatement ps = connection.prepareStatement(sql);
            ps.executeUpdate();
            connection.commit();
        } catch (SQLException ex) {
            error = true;
        }
        return !error;
    }

    @Override
    public Alumno get(int id) {
        error = false;
        Alumno entity = null;
        String sql = "SELECT "
                + "id, nif, nombre, apellido1, apellido2, pago "
                + "FROM alumnos WHERE id = ?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                entity = new Alumno();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
                entity.setPago(rs.getDouble("pago"));
            }
            rs.close();
        } catch (Exception ex) {
            error = true;
        }
        return entity;
    }

    @Override
    public List<Alumno> listAll() {
        error = false;
        Alumno entity = null;
        List<Alumno> list = new ArrayList<>();
        String sql = "SELECT "
                + "id, nif, nombre, apellido1, apellido2, pago "
                + "FROM alumnos "
                + "ORDER BY apellido1, apellido2, nombre";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                entity = new Alumno();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
                entity.setPago(rs.getDouble("pago"));
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
    public List<Alumno> listNext(int rows) {
        List<Alumno> list = new ArrayList();
        Alumno entity;
        error = false;
        String sql = "SELECT id, "
                + "nif, nif, nombre, apellido1, apellido2, pago "
                + "FROM alumnos "
                + "WHERE    "
                + "nif > ? "
                + "ORDER BY nif ASC LIMIT ?";

        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setString(1, nifAnterior);
            ps.setInt(2, rows);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                entity = new Alumno();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
                entity.setPago(rs.getDouble("pago"));
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

    private Integer _add(Alumno entity) throws SQLException {
        Integer id;
        String sql = "INSERT INTO alumnos "
                + "(nif, nombre, apellido1, apellido2, pago) VALUES "
                + "(?,?,?,?,?)";
        PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
        ps.setString(1, entity.getNif());
        ps.setString(2, entity.getNombre());
        ps.setString(3, entity.getApellido1());
        ps.setString(4, entity.getApellido2());
        ps.setDouble(5, entity.getPago());
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
    public Alumno getByNif(String nif) {
        error = false;
        Alumno entity = null;
        String sql = "SELECT "
                + "id, nif, nombre, apellido1, apellido2, pago "
                + "FROM alumnos WHERE nif = ?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setString(1, nif);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                entity = new Alumno();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
                entity.setPago(rs.getDouble("pago"));
            }
            rs.close();
        } catch (Exception ex) {
            error = true;
        }
        return entity;
    }

}

