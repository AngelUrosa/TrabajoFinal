//package com.daw2.proyectospringfinal.service.impl;
//
//import com.daw2.proyectospringfinal.model.entity.Articulo;
//import com.daw2.proyectospringfinal.model.entity.Carrito;
//import com.daw2.proyectospringfinal.model.entity.DetalleCarrito;
//import com.daw2.proyectospringfinal.model.repository.DetalleCarritoRepository;
//import com.daw2.proyectospringfinal.service.DetalleCarritoService;
//import org.springframework.beans.factory.annotation.Autowired;
//import org.springframework.stereotype.Service;
//
//import javax.persistence.Id;
//import java.util.List;
//
//@Service
//public class DetalleCarritoServiceImpl implements DetalleCarritoService {
//
//    @Autowired
//    DetalleCarritoRepository detalleCarritoRepository;
//
//    @Override
//    public DetalleCarrito save(DetalleCarrito detalleCarrito) {
//        return detalleCarritoRepository.save(detalleCarrito);
//    }
//
//    @Override
//    public List<DetalleCarrito> listAll() {
//        return detalleCarritoRepository.findAll();
//    }
//
//    @Override
//    public DetalleCarrito getById(int id) {
//        return detalleCarritoRepository.findById(id).orElse(null);
//    }
//
//    @Override
//    public void delete(int id) {
//        detalleCarritoRepository.delete(id);
//    }
//    @Override
//    public DetalleCarrito findCarritoAndArticulo(Carrito carrito, Articulo articulo){
//        return detalleCarritoRepository.findDetalleCarritoByCarritoAndArticulo(carrito ,articulo);
//    }
//    @Override
//    public List <DetalleCarrito> findCarrito (Carrito carrito){
//        return detalleCarritoRepository.findDetalleCarritoByCarrito(carrito);
//    }
//    @Override
//    public List <DetalleCarrito> findCarritoNotConfirm (int id) {
//        return detalleCarritoRepository.findDetalleCarritoWhereCarritoNotConfirm(id);
//    }
//}
