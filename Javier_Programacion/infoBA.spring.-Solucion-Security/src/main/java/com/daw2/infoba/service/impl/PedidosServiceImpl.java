package com.daw2.infoba.service.impl;

import com.daw2.infoba.model.entity.Pedido;
import com.daw2.infoba.model.repository.PedidosRepository;
import com.daw2.infoba.service.PedidosService;
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
