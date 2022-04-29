package com.daw2.infoba.service;

import com.daw2.infoba.model.entity.Pedido;

import java.util.List;

public interface PedidosService {
    Pedido save(Pedido pedido);
    List<Pedido> listAll();
    void delete(int id);
}
