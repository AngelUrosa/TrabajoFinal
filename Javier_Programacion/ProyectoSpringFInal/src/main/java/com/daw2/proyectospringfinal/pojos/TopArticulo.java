package com.daw2.proyectospringfinal.pojos;

import com.daw2.proyectospringfinal.model.entity.Articulo;

public class TopArticulo {
    private Articulo articulo;
    private  double total;

    public TopArticulo() {
    }

    public Articulo getArticulo() {
        return articulo;
    }

    public void setArticulo(Articulo articulo) {
        this.articulo = articulo;
    }

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }
}
