package com.daw2.proyectospringfinal.service.impl;
import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.repository.ArticulosRepository;
import com.daw2.proyectospringfinal.service.ArticulosService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ArticulosServiceImpl implements ArticulosService {
    @Autowired
    private ArticulosRepository articulosRepository;

   @Override
   public Articulo save(Articulo articulo){
       return articulosRepository.save(articulo);
   }

    @Override
    public List<Articulo> listAll() {
        return articulosRepository.findAll();
    }

    @Override
    public Articulo getByRef(String ref) {
        return articulosRepository.getByRef(ref);
    }

    @Override
    public List<Articulo> listByDescripcion(String descripcion) {
        return articulosRepository.findByDescripcionContainingIgnoreCase(descripcion);
    }

    @Override
    public List<Articulo> listByRef(String ref) {
        return articulosRepository.findByRefContainingIgnoreCase(ref);
    }

    @Override
    public List<Articulo> listLastRows(int rows) {
        return articulosRepository.findLastRows(PageRequest.of(0, rows));
    }

    @Override
    public void delete(int id) {
        articulosRepository.deleteById(id);
    }

    @Override
    public List<Articulo> listByProveedor(int idProveedor) {
        return articulosRepository.findByProveedorId(idProveedor);
    }


}
