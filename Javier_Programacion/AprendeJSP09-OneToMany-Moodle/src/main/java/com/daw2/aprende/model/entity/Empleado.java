package com.daw2.aprende.model.entity;

import java.util.Date;

public class Empleado {
    private Integer id;
    private String nif;
    private String nombre;
    private String apellido1;
    private String apellido2;
    private String telefono;
    private double sueldo;
    private Date fechaAlta;

    private Departamento departamento;

    public Empleado() {
    }

    public Empleado(String nif, String nombre, String apellido1, String apellido2, String telefono, double sueldo, Date fechaAlta) {
        this.nif = nif;
        this.nombre = nombre;
        this.apellido1 = apellido1;
        this.apellido2 = apellido2;
        this.telefono = telefono;
        this.sueldo = sueldo;
        this.fechaAlta = fechaAlta;
    }

    public Empleado(String nif, String nombre, String apellido1, String apellido2, String telefono, double sueldo, Date fechaAlta, Departamento departamento) {
        this.nif = nif;
        this.nombre = nombre;
        this.apellido1 = apellido1;
        this.apellido2 = apellido2;
        this.telefono = telefono;
        this.sueldo = sueldo;
        this.fechaAlta = fechaAlta;
        this.departamento = departamento;
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

    public double getSueldo() {
        return sueldo;
    }

    public void setSueldo(double sueldo) {
        this.sueldo = sueldo;
    }

    public Date getFechaAlta() {
        return fechaAlta;
    }

    public void setFechaAlta(Date fechaAlta) {
        this.fechaAlta = fechaAlta;
    }

    public Departamento getDepartamento() {
        return departamento;
    }

    public void setDepartamento(Departamento departamento) {
        this.departamento = departamento;
    }

    @Override
    public String toString() {
        return "Empleado{" +
                "id=" + id +
                ", nif='" + nif + '\'' +
                ", nombre='" + nombre + '\'' +
                ", apellido1='" + apellido1 + '\'' +
                ", apellido2='" + apellido2 + '\'' +
                ", telefono='" + telefono + '\'' +
                ", sueldo=" + sueldo +
                ", fechaAlta=" + fechaAlta +
                ", departamento=" + departamento +
                '}';
    }
}
