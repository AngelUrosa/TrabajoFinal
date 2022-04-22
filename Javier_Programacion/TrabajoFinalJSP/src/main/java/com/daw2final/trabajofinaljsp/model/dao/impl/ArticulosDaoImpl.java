package com.daw2final.trabajofinaljsp.model.dao.impl;

import com.daw2final.trabajofinaljsp.model.dao.ArticulosDao;
import com.daw2final.trabajofinaljsp.model.dao.ConectaBD;
import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.entity.Articulo;
import com.daw2final.trabajofinaljsp.model.entity.Proveedor;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;




    public class ArticulosDaoImpl implements ArticulosDao {
        private Connection connection;
        private boolean error;
        private String refAnterior;

        public ArticulosDaoImpl() {
            super();
            refAnterior = "";
            error = false;
            try {
                connection = ConectaBD.getConnection();
            } catch (SQLException e) {
                error = true;
                System.out.println("Se ha producido un error al acceder a la BD.");
            }
        }

        @Override
        public Integer add(Articulo entity) {
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
        public boolean add(List<Articulo> list) {
            error = false;
            try {
                for (Articulo entity : list) {
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
        public boolean update(Articulo entity) {
            error = false;
            String sql = "UPDATE articulos SET "
                    + "ref =?, descripcion=?, precio=?, stock=?, "
                    + "id_proveedor=? "
                    + "WHERE id=?";
            try (PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
                ps.setString(1, entity.getRef());
                ps.setString(2, entity.getDescripcion());
                ps.setDouble(3, entity.getPrecio());
                ps.setDouble(4, entity.getStock());
                ps.setInt(5, entity.getProveedor() != null ? entity.getProveedor().getId() : null);
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
            String sql = "DELETE FROM articulos "
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
                String sql = "DELETE FROM articulos";
                PreparedStatement ps = connection.prepareStatement(sql);
                ps.executeUpdate();
                connection.commit();
            } catch (SQLException ex) {
                error = true;
            }
            return !error;
        }

        @Override
        public Articulo get(int id) {
            error = false;
            Articulo entity = null;
            String sql = "SELECT "
                    + "id, ref , descripcion, precio, stock, "
                    + "id_proveedor "
                    + "FROM articulos WHERE id = ?";
            try (PreparedStatement ps = connection.prepareStatement(sql)) {
                ps.setInt(1, id);
                ResultSet rs = ps.executeQuery();
                if (rs.next()) {
                    entity = new Articulo();
                    entity.setId(rs.getInt("id"));
                    entity.setRef(rs.getString("ref"));
                    entity.setDescripcion(rs.getString("descrpcion"));
                    entity.setPrecio(rs.getDouble("precio"));
                    entity.setStock(rs.getDouble("stock"));
                    Proveedor prov = new Proveedor();
                    prov.setId(rs.getInt("id_proveedor"));
                    entity.setProveedor(prov);
                }
                rs.close();
            } catch (Exception ex) {
                error = true;
            }
            return entity;
        }

        @Override
        public List<Articulo> listAll() {
            error = false;
            Articulo entity = null;
            List<Articulo> list = new ArrayList<>();
            String sql = "SELECT "
                    + "id, ref , descripcion, precio, stock, "
                    + "id_proveedor "
                    + "FROM articulos "
                    + "ORDER BY ref, precio ";
            try (PreparedStatement ps = connection.prepareStatement(sql)) {
                ResultSet rs = ps.executeQuery();
                while (rs.next()) {
                    entity = new Articulo();
                    entity.setId(rs.getInt("id"));
                    entity.setRef(rs.getString("ref"));
                    entity.setDescripcion(rs.getString("descripcion"));
                    entity.setPrecio(rs.getDouble("precio"));
                    entity.setStock(rs.getDouble("stock"));
                    Proveedor prov = new Proveedor();
                    prov.setId(rs.getInt("id_proveedor"));
                    entity.setProveedor(prov);
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
        public List<Articulo> listNext(int rows) {
            List<Articulo> list = new ArrayList();
            Articulo entity;
            error = false;
            String sql = "SELECT id, "
                    + "ref, descripcion, precio, stock, id_proveedor "
                    + "FROM articulos "
                    + "WHERE    "
                    + "ref > ? "
                    + "ORDER BY ref ASC LIMIT ?";

            try (PreparedStatement ps = connection.prepareStatement(sql)) {
                ps.setString(1, refAnterior);
                ps.setInt(2, rows);
                ResultSet rs = ps.executeQuery();
                while (rs.next()) {
                    entity = new Articulo();
                    entity.setId(rs.getInt("id"));
                    entity.setRef(rs.getString("ref"));
                    entity.setDescripcion(rs.getString("descripcion"));
                    entity.setPrecio(rs.getDouble("precio"));
                    entity.setStock(rs.getDouble("stock"));
                    Proveedor prov = new Proveedor();
                    prov.setId(rs.getInt("id_proveedor"));
                    entity.setProveedor(prov);
                    list.add(entity);
                }
                rs.close();
                if (!list.isEmpty())
                    refAnterior = list.get(list.size() - 1).getRef();
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

        private Integer _add(Articulo entity) throws SQLException {
            Integer id;
            String sql = "INSERT INTO articulos "
                    + "(ref, descripcion, precio, stock, id_proveedor) VALUES "
                    + "(?,?,?,?,?)";
            PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
            ps.setString(1, entity.getRef());
            ps.setString(2, entity.getDescripcion());
            ps.setDouble(3, entity.getPrecio());
            ps.setDouble(4, entity.getStock());
            ps.setInt(5, entity.getProveedor() != null ? entity.getProveedor().getId() : null);
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
        public Articulo getByRef(String ref) {
            error = false;
            Articulo entity = null;
            String sql = "SELECT "
                    + "id, ref , descripcion, precio, stock, "
                    + "id_proveedor "
                    + "FROM articulos WHERE ref = ?";
            try (PreparedStatement ps = connection.prepareStatement(sql)) {
                ps.setString(1, ref);
                ResultSet rs = ps.executeQuery();
                if (rs.next()) {
                    entity = new Articulo();
                    entity.setId(rs.getInt("id"));
                    entity.setRef(rs.getString("ref"));
                    entity.setDescripcion(rs.getString("descripcion"));
                    entity.setPrecio(rs.getDouble("precio"));
                    entity.setStock(rs.getDouble("stock"));
                    Proveedor prov = new Proveedor();
                    prov.setId(rs.getInt("id_proveedor"));
                    entity.setProveedor(prov);
                }
                rs.close();
            } catch (Exception ex) {
                error = true;
            }
            return entity;
        }



        @Override
        public List<Articulo> listAllFillProv() {
            ProveedoresDao provDao = new ProveedoresDaoImpl();
            List<Articulo> list = listAll();
            list.forEach(a -> a.setProveedor(provDao.get(a.getProveedor().getId())));
            return list;
        }

    }


