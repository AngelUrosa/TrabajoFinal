package com.daw2.proyectospringfinal.model.repository;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface ArticulosRepository extends JpaRepository<Articulo, Integer> {
    Articulo getByRef(String ref);
    List<Articulo> findByDescripcionContainingIgnoreCase(String descripcion);
    List<Articulo> findByDescripcionContaining(String descripcion);
    List<Articulo> findByRefContainingIgnoreCase(String ref);
    @Query("select a from Articulo a order by a.id desc")
    List<Articulo> findLastRows(Pageable page);
    List<Articulo> findByProveedorId(int idProveedor);
}


// articulosRepository.findByDescripcionContainingIgnoreCase(descripcion);
// articulosRepository.findByDescripcionIsContainingIgnoreCase(descripcion);
// articulosRepository.findByDescripcionContainsIgnoreCase(descripcion);
// articulosRepository.findByDescripcionNotContainsIgnoreCase(descripcion);
// articulosRepository.findByDescripcionLikeIgnoreCase(descripcion);   // ej. findByDescripcionLikeIgnoreCase("%mar%"")
//@Query("SELECT m FROM Movie m WHERE m.title LIKE %:descripcion%")
//List<Articulo> findByDescripcion(@Param("descripcion")String descripcion)
//@Query("SELECT m FROM Movie m WHERE m.title LIKE %:$1%")
//List<Articulo> findByDescripcion(String descripcion)