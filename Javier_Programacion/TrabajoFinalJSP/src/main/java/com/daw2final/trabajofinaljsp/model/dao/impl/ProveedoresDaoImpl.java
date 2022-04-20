package com.daw2final.trabajofinaljsp.model.dao.impl;

import com.daw2final.trabajofinaljsp.model.dao.ConectaBD;
import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.entity.Proveedor;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;



    public class ProveedoresDaoImpl implements ProveedoresDao {
        private Connection connection;
        private boolean error;
        private String nifAnterior;

        public ProveedoresDaoImpl() {
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
        public Integer add(Proveedor entity) {
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
        public boolean add(List<Proveedor> list) {
            error = false;
            try {
                for (Proveedor entity : list) {
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
        public boolean update(Proveedor entity) {
            error = false;
            String sql = "UPDATE proveedores SET "
                    + "nif =?, nombre=?, apellido1=?, apellido2=?, "
                    + "telefono=?, razon_social=?, email=? "
                    + "WHERE id=?";
            try (PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
                ps.setString(1, entity.getNif());
                ps.setString(2, entity.getNombre());
                ps.setString(3, entity.getApellido1());
                ps.setString(4, entity.getApellido2());
                ps.setString(5, entity.getTelefono());
                ps.setString(6, entity.getRazonSocial());
                ps.setString(7, entity.getEmail());
                ps.setInt(8, entity.getId());
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
            String sql = "DELETE FROM proveedores "
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
                String sql = "DELETE FROM proveedores";
                PreparedStatement ps = connection.prepareStatement(sql);
                ps.executeUpdate();
                connection.commit();
            } catch (SQLException ex) {
                error = true;
            }
            return !error;
        }

        @Override
        public Proveedor get(int id) {
            error = false;
            Proveedor entity = null;
            String sql = "SELECT "
                    + "id, nif , nombre, apellido1, apellido2, "
                    + "telefono, razon_social, email "
                    + "FROM proveedores WHERE id = ?";
            try (PreparedStatement ps = connection.prepareStatement(sql)) {
                ps.setInt(1, id);
                ResultSet rs = ps.executeQuery();
                if (rs.next()) {
                    entity = new Proveedor();
                    entity.setId(rs.getInt("id"));
                    entity.setNif(rs.getString("nif"));
                    entity.setNombre(rs.getString("nombre"));
                    entity.setApellido1(rs.getString("apellido1"));
                    entity.setApellido2(rs.getString("apellido2"));
                    entity.setTelefono(rs.getString("telefono"));
                    entity.setRazonSocial(rs.getString("razon_social"));
                    entity.setEmail(rs.getString("email"));
                }
                rs.close();
            } catch (Exception ex) {
                error = true;
            }
            return entity;
        }

        @Override
        public List<Proveedor> listAll() {
            error = false;
            Proveedor entity = null;
            List<Proveedor> list = new ArrayList<>();
            String sql = "SELECT "
                    + "id, nif, nombre, apellido1, apellido2, "
                    + "telefono, razon_social, email "
                    + "FROM proveedores "
                    + "ORDER BY apellido1, apellido2, nombre";
            try (PreparedStatement ps = connection.prepareStatement(sql)) {
                ResultSet rs = ps.executeQuery();
                while (rs.next()) {
                    entity = new Proveedor();
                    entity.setId(rs.getInt("id"));
                    entity.setNif(rs.getString("nif"));
                    entity.setNombre(rs.getString("nombre"));
                    entity.setApellido1(rs.getString("apellido1"));
                    entity.setApellido2(rs.getString("apellido2"));
                    entity.setTelefono(rs.getString("telefono"));
                    entity.setRazonSocial(rs.getString("razon_social"));
                    entity.setEmail(rs.getString("email"));
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
        public List<Proveedor> listNext(int rows) {
            List<Proveedor> list = new ArrayList();
            Proveedor entity;
            error = false;
            String sql = "SELECT id, "
                    + "nif, nombre, apellido1, apellido2, telefono, razon_social, email "
                    + "FROM proveedores "
                    + "WHERE    "
                    + "nif > ? "
                    + "ORDER BY nif ASC LIMIT ?";

            try (PreparedStatement ps = connection.prepareStatement(sql)) {
                ps.setString(1, nifAnterior);
                ps.setInt(2, rows);
                ResultSet rs = ps.executeQuery();
                while (rs.next()) {
                    entity = new Proveedor();
                    entity.setId(rs.getInt("id"));
                    entity.setNif(rs.getString("nif"));
                    entity.setNombre(rs.getString("nombre"));
                    entity.setApellido1(rs.getString("apellido1"));
                    entity.setApellido2(rs.getString("apellido2"));
                    entity.setTelefono(rs.getString("telefono"));
                    entity.setRazonSocial(rs.getString("razon_social"));
                    entity.setEmail(rs.getString("email"));
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

        private Integer _add(Proveedor entity) throws SQLException {
            Integer id;
            String sql = "INSERT INTO proveedores "
                    + "(nif, nombre, apellido1, apellido2, telefono, razon_social, email) VALUES "
                    + "(?,?,?,?,?,?,?)";
            PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
            ps.setString(1, entity.getNif());
            ps.setString(2, entity.getNombre());
            ps.setString(3, entity.getApellido1());
            ps.setString(4, entity.getApellido2());
            ps.setString(5, entity.getTelefono());
            ps.setString(6, entity.getRazonSocial());
            ps.setString(7, entity.getEmail());
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
     /*   @Override
        public List<Articulo> listAllFillProv() {
            ProveedoresDao provDao = new ProveedoresDaoImpl();
            List<Articulo> list = listAll();
            list.forEach(a -> a.setProveedor(provDao.get(a.getProveedor().getId())));
            return list;
        } */


        @Override
        public Proveedor getByNif(String nif) {
            error = false;
            Proveedor entity = null;
            String sql = "SELECT "
                    + "id, nif , nombre, apellido1, apellido2, "
                    + "telefono, razon_social, email "
                    + "FROM proveedores WHERE nif = ?";
            try (PreparedStatement ps = connection.prepareStatement(sql)) {
                ps.setString(1, nif);
                ResultSet rs = ps.executeQuery();
                if (rs.next()) {
                    entity = new Proveedor();
                    entity.setId(rs.getInt("id"));
                    entity.setNif(rs.getString("nif"));
                    entity.setNombre(rs.getString("nombre"));
                    entity.setApellido1(rs.getString("apellido1"));
                    entity.setApellido2(rs.getString("apellido2"));
                    entity.setTelefono(rs.getString("telefono"));
                    entity.setRazonSocial(rs.getString("razon_social"));
                    entity.setEmail(rs.getString("email"));
                }
                rs.close();
            } catch (Exception ex) {
                error = true;
            }
            return entity;
        }

        @Override
        public boolean deleteByNif(String nif) {
            error = false;
            String sql = "DELETE FROM proveedores "
                    + "WHERE nif=?";
            try (PreparedStatement ps = connection.prepareStatement(sql)) {
                ps.setString(1, nif);
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

    }




