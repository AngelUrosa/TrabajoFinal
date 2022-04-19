package com.daw2.ejemplo01.model.entity;

public class Alumno {
    private Integer id;
    private String nif;
    private String nombre;
    private String apellido1;
    private String apellido2;
    private double pago;

    public Alumno() {
        this(null, null, null, 0);
    }

    public Alumno(String nif, String nombre, String apellido1, int pago) {
        this(null, null, null, null, 0);
    }

    public Alumno(String nif, String nombre, String apellido1, String apellido2, double pago) {
        this.id = null;
        this.nif = nif;
        this.nombre = nombre;
        this.apellido1 = apellido1;
        this.apellido2 = apellido2;
        this.pago = pago;
    }

    public Alumno(Integer id, String nif, String nombre, String apellido1, String apellido2, double pago) {
        this.id = id;
        this.nif = nif;
        this.nombre = nombre;
        this.apellido1 = apellido1;
        this.apellido2 = apellido2;
        this.pago = pago;
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

    public double getPago() {
        return pago;
    }

    public void setPago(double pago) {
        this.pago = pago;
    }

    @Override
    public String toString() {
        return "Alumno{" +
                "id=" + id +
                ", nif='" + nif + '\'' +
                ", nombre='" + nombre + '\'' +
                ", apellido1='" + apellido1 + '\'' +
                ", apellido2='" + apellido2 + '\'' +
                ", pago=" + pago +
                '}';
    }
}


