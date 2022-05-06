package com.daw2.proyectospringfinal.service.impl;

import com.daw2.proyectospringfinal.model.entity.Pedido;
import com.daw2.proyectospringfinal.model.repository.PedidosRepository;
import com.daw2.proyectospringfinal.service.PedidosService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;

@Service
public class PedidosServiceImpl implements PedidosService {
    @Autowired
    private PedidosRepository pedidosRepository;

    @Transactional
    @Override
    public Pedido save(Pedido pedido) {
        Pedido p = pedidosRepository.save(pedido);
        return p;
    }

    @Transactional(readOnly = true)
    @Override
    public List<Pedido> listAll() {
        return pedidosRepository.findAll();
    }

    @Override
    public void delete(int id) {
        pedidosRepository.deleteById(id);
    }
}
