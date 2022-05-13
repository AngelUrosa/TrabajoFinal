//package com.daw2.proyectospringfinal.model.repository;
//
//import com.daw2.proyectospringfinal.model.entity.Articulo;
//import com.daw2.proyectospringfinal.model.entity.Carrito;
//import com.daw2.proyectospringfinal.model.entity.DetalleCarrito;
//import org.springframework.data.jpa.repository.JpaRepository;
//import org.springframework.data.jpa.repository.Query;
//
//import java.util.List;
//
//public interface DetalleCarritoRepository extends JpaRepository<DetalleCarrito, Integer> {
//
//    DetalleCarrito findDetalleCarritoByCarritoAndArticulo(Carrito carrito, Articulo articulo);
//
//    List <DetalleCarrito> findDetalleCarritoByCarrito (Carrito carrito);
//
//    @Query(value = "SELECT * FROM detalle_carrito WHERE carrito_id IN (SELECT id FROM carrito WHERE confirm = false)", nativeQuery = true)
//    List<DetalleCarrito> findDetalleCarritoWhereCarritoNotConfirm(int idCarrito);
//
//    void delete(int id);
//}
