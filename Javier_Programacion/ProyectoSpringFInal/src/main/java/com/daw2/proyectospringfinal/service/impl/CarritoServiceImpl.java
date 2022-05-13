package com.daw2.proyectospringfinal.service.impl;

import com.daw2.proyectospringfinal.model.entity.Carrito;
import com.daw2.proyectospringfinal.model.entity.Usuario;
import com.daw2.proyectospringfinal.model.repository.CarritoRepository;
import com.daw2.proyectospringfinal.service.CarritoService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class CarritoServiceImpl implements CarritoService {

    @Autowired
    CarritoRepository carritoRepository;

    @Override
    public Carrito save(Carrito carrito) {
        return carritoRepository.save(carrito);
    }

    @Override
    public List<Carrito> listAll() {
        return carritoRepository.findAll();
    }

    @Override
    public Carrito getById(int id) {
        return carritoRepository.getById(id);
    }

    @Override
    public Carrito notConfirm (Usuario usuario){
        return carritoRepository.findCarritoByUsuarioAndConfirmFalse(usuario);
    }
}
