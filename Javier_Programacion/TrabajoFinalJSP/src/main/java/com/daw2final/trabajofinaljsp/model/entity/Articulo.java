package com.daw2final.trabajofinaljsp.model.entity;

public class Articulo {
    private Integer id;
    private String ref;
    private String descripcion;
    private double precio;
    private double stock;

    private Proveedor proveedor;

    public Articulo(Integer id, String ref, String descripcion, double precio, double stock) {
        this.id = id;
        this.ref = ref;
        this.descripcion = descripcion;
        this.precio = precio;
        this.stock = stock;
    }

    public Articulo(Integer id, String ref, String descripcion, double precio, double stock, Proveedor proveedor) {
        this.id = id;
        this.ref = ref;
        this.descripcion = descripcion;
        this.precio = precio;
        this.stock = stock;
        this.proveedor = proveedor;
    }

    public Articulo() {

    }

    public Articulo(String ref, String descripcion, double precio, double stock) {
    }

    public Articulo(String ref, String descripcion, double precio, double stock, Proveedor prov) {
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getRef() {
        return ref;
    }

    public void setRef(String ref) {
        this.ref = ref;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }

    public double getStock() {
        return stock;
    }

    public void setStock(double stock) {
        this.stock = stock;
    }

    public Proveedor getProveedor() {
        return proveedor;
    }

    public void setProveedor(Proveedor proveedor) {
        this.proveedor = proveedor;
    }

    @Override
    public String toString() {
        return "Articulo{" +
                "id=" + id +
                ", ref='" + ref + '\'' +
                ", descripcion='" + descripcion + '\'' +
                ", precio=" + precio +
                ", stock=" + stock +
                ", proveedor=" + proveedor +
                '}';
    }
}
