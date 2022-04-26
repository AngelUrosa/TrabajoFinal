package com.daw2.proyectospringfinal.service.impl;

import com.daw2.proyectospringfinal.model.entity.DetalleFactura;
import com.daw2.proyectospringfinal.model.entity.Factura;
import com.daw2.proyectospringfinal.model.repository.DetalleFacturasRepository;
import com.daw2.proyectospringfinal.model.repository.FacturasRepository;
import com.daw2.proyectospringfinal.service.FacturasService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.Date;
import java.util.List;

@Service
public class FacturasServiceImpl implements FacturasService {
    @Autowired
    private FacturasRepository facturasRepository;
    @Autowired
    private DetalleFacturasRepository detalleRepository;

    @Override
    public Factura save(Factura factura) {
        return facturasRepository.save(factura);
    }

    @Transactional
    @Override
    public Factura saveWithDetalle(Factura factura) {
        factura.setModifiedAt(new Date());
        Factura facturaGuardada = facturasRepository.save(factura);
        factura.getDetalleFacturas().forEach(detalle -> {
            if (detalle.getArticulo().getId() != null) {
                detalle.setFactura(facturaGuardada);
                detalleRepository.save(detalle);
            }
        });
        return facturaGuardada;
    }

    @Transactional
    @Override
    public Factura updateWithDetalle(Factura factura, List<DetalleFactura> borrados) {
        if (borrados!=null)
            borrados.forEach(detalle-> detalleRepository.delete(detalle));
        factura.setModifiedAt(new Date());
        Factura facturaGuardada = facturasRepository.save(factura);
        factura.getDetalleFacturas().forEach(detalle -> {
            if (detalle.getArticulo().getId() != null) {
                detalle.setFactura(facturaGuardada);
                detalleRepository.save(detalle);
            }
        });
        return facturaGuardada;
    }

    @Override
    public double totalFacturaById(int id) {
        Double total = detalleRepository.totalFactura(id);
        return total != null ? total : 0;
    }

    @Override
    public List<Factura> listAll() {
        return facturasRepository.findAll();
    }

    @Override
    public List<Factura> listLastRows(int rows) {
        return facturasRepository.findLastRows(PageRequest.of(0, rows));
    }

    @Transactional(readOnly = false)
    @Override
    public Factura getByNumFactura(String numFactura) {
        return facturasRepository.getByNumFactura(numFactura);
    }

    @Override
    public List<Factura> listByNumFactura(String numFactura) {
        return facturasRepository.findByNumFactura(numFactura);
    }

    @Override
    public List<Factura> listByNif(String nif) {
        return facturasRepository.findByNif(nif);
    }

    @Override
    public void delete(int id) {
        facturasRepository.deleteById(id);
    }

    @Override
    public void deleteDetalleById(int id) {
        detalleRepository.deleteById(id);
    }

    @Transactional
    @Override
    public void deleteDetalle(List<DetalleFactura> detalleFacturas) {
        if (detalleFacturas != null)
            for (DetalleFactura detalle : detalleFacturas)
                detalleRepository.delete(detalle);
    }

    @Transactional
    @Override
    public void deleteWithDetalle(Factura factura) {
        factura = facturasRepository.getById(factura.getId());
        if (factura.getDetalleFacturas()!=null)
            factura.getDetalleFacturas().forEach(detalle-> detalleRepository.delete(detalle));
        facturasRepository.delete(factura);
    }

}

