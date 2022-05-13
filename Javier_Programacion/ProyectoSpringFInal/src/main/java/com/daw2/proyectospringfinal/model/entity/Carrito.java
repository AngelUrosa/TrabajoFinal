package com.daw2.proyectospringfinal.model.entity;

import javax.persistence.*;
import java.sql.Date;
import java.time.LocalDate;


@Entity
@Table(name="carrito")
public class Carrito {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;

    @ManyToOne
    private Usuario usuario;

    private boolean confirm;

    private Date fechaPedido;

    private double total;

    public Carrito() {
    }

    public Carrito(int id, Usuario usuario, boolean confirm, Date fechaPedido, double total) {
        this.id = id;
        this.usuario = usuario;
        this.confirm = confirm;
        this.fechaPedido = fechaPedido;
        this.total = total;
    }

    public Carrito(Usuario usuario, boolean confirm, Date fechaPedido, double total) {
        this.usuario = usuario;
        this.confirm = confirm;
        this.fechaPedido = fechaPedido;
        this.total = total;
    }

    public Carrito(Usuario usuario) {
        this.usuario = usuario;
        this.confirm=false;
        this.fechaPedido = Date.valueOf(LocalDate.now());
        this.total=0;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public Usuario getUsuario() {
        return usuario;
    }

    public void setUsuario(Usuario usuario) {
        this.usuario = usuario;
    }

    public boolean isConfirm() {
        return confirm;
    }

    public void setConfirm(boolean confirm) {
        this.confirm = confirm;
    }

    public Date getFechaPedido() {
        return fechaPedido;
    }

    public void setFechaPedido(Date fechaPedido) {
        this.fechaPedido = fechaPedido;
    }

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }
}
