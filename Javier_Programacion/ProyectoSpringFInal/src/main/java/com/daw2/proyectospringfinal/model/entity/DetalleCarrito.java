package com.daw2.proyectospringfinal.model.entity;

import javax.persistence.*;


@Entity
@Table(name="detalle_carrito")
public class DetalleCarrito {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;

    @ManyToOne
    private Carrito carrito;

    @ManyToOne
    private Articulo articulo;

    private int cantidad;

    public DetalleCarrito() {
    }

    public DetalleCarrito(int id, Carrito carrito, Articulo articulo, int cantidad) {
        this.id = id;
        this.carrito = carrito;
        this.articulo = articulo;
        this.cantidad = cantidad;
    }

    public DetalleCarrito(Carrito carrito, Articulo articulo, int cantidad) {
        this.carrito = carrito;
        this.articulo = articulo;
        this.cantidad = cantidad;
    }

    public DetalleCarrito(Carrito carrito, Articulo articulo) {
        this.carrito = carrito;
        this.articulo = articulo;
        this.cantidad=1;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public Carrito getCarrito() {
        return carrito;
    }

    public void setCarrito(Carrito carrito) {
        this.carrito = carrito;
    }

    public Articulo getArticulo() {
        return articulo;
    }

    public void setArticulo(Articulo articulo) {
        this.articulo = articulo;
    }

    public int getCantidad() {
        return cantidad;
    }

    public void setCantidad(int cantidad) {
        this.cantidad = cantidad;
    }
}
