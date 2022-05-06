package com.daw2.proyectospringfinal.components;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.entity.DetalleFactura;
import com.daw2.proyectospringfinal.model.entity.Factura;
import com.daw2.proyectospringfinal.service.ArticulosService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;
import org.springframework.web.context.annotation.SessionScope;

import javax.annotation.PostConstruct;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

@Component
@SessionScope
public class FacturaComponent {
    @Autowired
    private ArticulosService articulosService;
    private Factura factura;
    private List<DetalleFactura> detalleBorrados;

    @PostConstruct
    public void init() {
        factura = new Factura();
        factura.setFecha(new Date());
        inicializaDetalle();
    }

    public Factura getFactura() {
        return factura;
    }

    public void setFactura(Factura factura) {
        this.factura = factura;
        inicializaDetalle();
    }

    public List<DetalleFactura> getDetalleBorrados() {
        return detalleBorrados;
    }

    public void setDetalleBorrados(List<DetalleFactura> detalleBorrados) {
        this.detalleBorrados = detalleBorrados;
    }


    public void inicializaDetalle() {
        if (factura.getDetalleFacturas() == null || factura.getDetalleFacturas().isEmpty()) {
            List<DetalleFactura> detalles = new ArrayList<>();
            detalles.add(new DetalleFactura());
            factura.setDetalleFacturas(detalles);
            inicializaDetalleBorrados();
        }
    }

    public void inicializaDetalleBorrados() {
        detalleBorrados = new ArrayList<>();
    }

    public void addDetalle() {
        DetalleFactura detalle = new DetalleFactura();
        detalle.setUnidades(1);
        detalle.setDto(0);
        factura.getDetalleFacturas().add(detalle);
    }

    public void deleteDetalle(int pos) {
        if (detalleBorrados == null)
            detalleBorrados = new ArrayList<>();
        if (pos < factura.getDetalleFacturas().size()) {
            if (factura.getDetalleFacturas().get(pos).getId() != null)  // Guarda con id para ser borrados al actualizar
                detalleBorrados.add(factura.getDetalleFacturas().get(pos));
            factura.getDetalleFacturas().remove(pos);
        }
        if (factura.getDetalleFacturas().isEmpty())
            addDetalle();
    }

    public void completaDetalle(int pos) {
        DetalleFactura detalle = factura.getDetalleFacturas().get(pos);
        Articulo articulo = articulosService.getByRef(detalle.getArticulo().getRef());
        detalle.setFactura(factura);
        detalle.setArticulo(articulo);
        detalle.setPrecio(articulo.getPrecio());
    }

    public DetalleFactura getDetalle(int pos) {
        if (pos < factura.getDetalleFacturas().size())
            return factura.getDetalleFacturas().get(pos);
        else
            return null;
    }

    public List<DetalleFactura> listDetalles() {
        return factura.getDetalleFacturas();
    }

}
