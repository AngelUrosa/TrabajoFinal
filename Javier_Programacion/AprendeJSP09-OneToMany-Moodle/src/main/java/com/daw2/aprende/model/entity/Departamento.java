package com.daw2.aprende.model.entity;

import java.util.List;

public class Departamento {
    private Integer id;
    private String codDpto;
    private String descripcion;
    private List<Empleado> empleados;

    public Departamento() {
    }

    public Departamento(String codDpto, String descripcion) {
        this.codDpto = codDpto;
        this.descripcion = descripcion;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getCodDpto() {
        return codDpto;
    }

    public void setCodDpto(String codDpto) {
        this.codDpto = codDpto;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public List<Empleado> getEmpleados() {
        return empleados;
    }

    public void setEmpleados(List<Empleado> empleados) {
        this.empleados = empleados;
    }

    @Override
    public String toString() {
        return "Departamento{" +
                "id=" + id +
                ", codDpto='" + codDpto + '\'' +
                ", descripcion='" + descripcion + '\'' +
                '}';
    }
}

