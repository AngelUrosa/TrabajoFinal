package com.daw2.proyectospringfinal.service;

import com.daw2.proyectospringfinal.model.entity.Pedido;

import java.util.List;

public interface PedidosService {
    Pedido save(Pedido pedido);
    List<Pedido> listAll();
    void delete(int id);
}
