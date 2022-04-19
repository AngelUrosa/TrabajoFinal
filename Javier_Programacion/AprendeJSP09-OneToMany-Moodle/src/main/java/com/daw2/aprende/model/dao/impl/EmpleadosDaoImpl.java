package com.daw2.aprende.model.dao.impl;

import com.daw2.aprende.model.dao.ConectaBD;
import com.daw2.aprende.model.dao.DepartamentosDao;
import com.daw2.aprende.model.dao.EmpleadosDao;
import com.daw2.aprende.model.entity.Departamento;
import com.daw2.aprende.model.entity.Empleado;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class EmpleadosDaoImpl implements EmpleadosDao {
    private Connection connection;
    private boolean error;
    private String nifAnterior;

    public EmpleadosDaoImpl() {
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
    public Integer add(Empleado entity) {
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
    public boolean add(List<Empleado> list) {
        error = false;
        try {
            for (Empleado entity : list) {
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
    public boolean update(Empleado entity) {
        error = false;
        String sql = "UPDATE empleados SET "
                + "nif=?, nombre=?, apellido1=?, apellido2=?, "
                + "telefono=?, sueldo=?, fecha_alta=?, id_dpto=? "
                + "WHERE id=?";
        try (PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, entity.getNif());
            ps.setString(2, entity.getNombre());
            ps.setString(3, entity.getApellido1());
            ps.setString(4, entity.getApellido2());
            ps.setString(5, entity.getTelefono());
            ps.setDouble(6, entity.getSueldo());
            ps.setDate(7, utilDateToSqlDate(entity.getFechaAlta()));
            ps.setInt(8, entity.getDepartamento() != null ? entity.getDepartamento().getId() : null);
            ps.setInt(9, entity.getId());
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
        String sql = "DELETE FROM empleados "
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
            String sql = "DELETE FROM empleados";
            PreparedStatement ps = connection.prepareStatement(sql);
            ps.executeUpdate();
            connection.commit();
        } catch (SQLException ex) {
            error = true;
        }
        return !error;
    }

    @Override
    public Empleado get(int id) {
        error = false;
        Empleado entity = null;
        String sql = "SELECT "
                + "id, nif, nombre, apellido1, apellido2, "
                + "telefono, sueldo, fecha_alta, id_dpto "
                + "FROM empleados WHERE id = ?";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                entity = new Empleado();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
                entity.setTelefono(rs.getString("telefono"));
                entity.setSueldo(rs.getDouble("sueldo"));
                entity.setFechaAlta(rs.getDate("fecha_alta"));
                Departamento dpto = new Departamento();
                dpto.setId(rs.getInt("id_dpto"));
                entity.setDepartamento(dpto);
            }
            rs.close();
        } catch (Exception ex) {
            error = true;
        }
        return entity;
    }

    @Override
    public List<Empleado> listAll() {
        error = false;
        Empleado entity = null;
        List<Empleado> list = new ArrayList<>();
        String sql = "SELECT "
                + "id, nif, nombre, apellido1, apellido2, "
                + "telefono, sueldo, fecha_alta, id_dpto "
                + "FROM empleados "
                + "ORDER BY apellido1, apellido2, nombre";
        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                entity = new Empleado();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
                entity.setTelefono(rs.getString("telefono"));
                entity.setSueldo(rs.getDouble("sueldo"));
                entity.setFechaAlta(rs.getDate("fecha_alta"));
                Departamento dpto = new Departamento();
                dpto.setId(rs.getInt("id_dpto"));
                entity.setDepartamento(dpto);
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
    public List<Empleado> listNext(int rows) {
        List<Empleado> list = new ArrayList();
        Empleado entity;
        error = false;
        String sql = "SELECT id, "
                + "nif, nif, nombre, apellido1, apellido2, "
                + "telefono, sueldo, fecha_alta, id_dpto "
                + "FROM empleados "
                + "WHERE    "
                + "nif > ? "
                + "ORDER BY nif ASC LIMIT ?";

        try (PreparedStatement ps = connection.prepareStatement(sql)) {
            ps.setString(1, nifAnterior);
            ps.setInt(2, rows);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                entity = new Empleado();
                entity.setId(rs.getInt("id"));
                entity.setNif(rs.getString("nif"));
                entity.setNombre(rs.getString("nombre"));
                entity.setApellido1(rs.getString("apellido1"));
                entity.setApellido2(rs.getString("apellido2"));
                entity.setTelefono(rs.getString("telefono"));
                entity.setSueldo(rs.getDouble("sueldo"));
                entity.setFechaAlta(rs.getDate("fecha_alta"));
                Departamento dpto = new Departamento();
                dpto.setId(rs.getInt("id_dpto"));
                entity.setDepartamento(dpto);
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

    private Integer _add(Empleado entity) throws SQLException {
        Integer id;
        String sql = "INSERT INTO empleados "
                + "(nif, nombre, apellido1, apellido2, telefono, sueldo, fecha_alta, id_dpto) VALUES "
                + "(?,?,?,?,?,?,?,?)";
        PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
        ps.setString(1, entity.getNif());
        ps.setString(2, entity.getNombre());
        ps.setString(3, entity.getApellido1());
        ps.setString(4, entity.getApellido2());
        ps.setString(5, entity.getTelefono());
        ps.setDouble(6, entity.getSueldo());
        // ps.setDate(7, new java.sql.Date(entity.getFechaAlta().getTime()));
        ps.setDate(7, utilDateToSqlDate(entity.getFechaAlta()));
        ps.setInt(8, entity.getDepartamento() != null ? entity.getDepartamento().getId() : null);
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
    public List<Empleado> listAllFillDpto() {
        DepartamentosDao dptoDao = new DepartamentosDaoImpl();
        List<Empleado> list = listAll();
        list.forEach(e -> e.setDepartamento(dptoDao.get(e.getDepartamento().getId())));
        return list;
    }
}
