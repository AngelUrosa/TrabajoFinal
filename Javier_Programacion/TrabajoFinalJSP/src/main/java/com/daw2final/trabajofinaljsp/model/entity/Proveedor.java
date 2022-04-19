package com.daw2final.trabajofinaljsp.model.entity;

import java.util.List;

public class Proveedor {
    private Integer id;
    private String nif;
    private String nombre;
    private String apellido1;
    private String apellido2;
    private String telefono;
    private String razonSocial;
    private String email;
    protected List<Articulo> articulos;

    public Proveedor() {
        this(null,null,null,null,null,null,null,null);
    }
    public Proveedor(Integer id, String nif, String nombre, String apellido1, double telefono, String razonSocial, String email) {
        this(null,null,null,null,null,null,null,null);
    }

    public Proveedor(String nif, String nombre, String apellido1, String apellido2, String telefono, String razonSocial, String email) {
        this.id = null;
        this.nif = nif;
        this.nombre = nombre;
        this.apellido1 = apellido1;
        this.apellido2 = apellido2;
        this.telefono = telefono;
        this.razonSocial = razonSocial;
        this.email = email;
    }
    public Proveedor(Integer id, String nif, String nombre, String apellido1, String apellido2, String telefono, String razonSocial, String email) {
        this.id = id;
        this.nif = nif;
        this.nombre = nombre;
        this.apellido1 = apellido1;
        this.apellido2 = apellido2;
        this.telefono = telefono;
        this.razonSocial = razonSocial;
        this.email = email;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getNif() {
        return nif;
    }

    public void setNif(String nif) {
        this.nif = nif;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido1() {
        return apellido1;
    }

    public void setApellido1(String apellido1) {
        this.apellido1 = apellido1;
    }

    public String getApellido2() {
        return apellido2;
    }

    public void setApellido2(String apellido2) {
        this.apellido2 = apellido2;
    }

    public String getTelefono() {
        return telefono;
    }

    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }

    public String getRazonSocial() {
        return razonSocial;
    }

    public void setRazonSocial(String razonSocial) {
        this.razonSocial = razonSocial;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public List<Articulo> getArticulos() {
        return articulos;
    }

    public void setArticulos(List<Articulo> articulos) {
        this.articulos = articulos;
    }

    @Override
    public String toString() {
        return "Proveedor{" +
                "id=" + id +
                ", nif='" + nif + '\'' +
                ", nombre='" + nombre + '\'' +
                ", apellido1='" + apellido1 + '\'' +
                ", apellido2='" + apellido2 + '\'' +
                ", telefono=" + telefono +
                ", razonSocial='" + razonSocial + '\'' +
                ", email='" + email + '\'' +
                '}';
    }
}
