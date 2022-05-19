package com.daw2.proyectospringfinal.model.entity;

import javax.persistence.*;

@Entity
@Table(name = "usuarios_articulos")
public class ArticulosUsuarios {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    @ManyToOne
    @JoinColumn(name = "id_usuario")
    private Usuario usuario;

    @ManyToOne
    @JoinColumn(name = "id_articulo")
    private Articulo articulo;

    private int cantidad;

    public ArticulosUsuarios() {
    }

    public ArticulosUsuarios(Usuario usuario, Articulo articulo, int cantidad) {
        this.usuario = usuario;
        this.articulo = articulo;
        this.cantidad = cantidad;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Usuario getUsuario() {
        return usuario;
    }

    public void setUsuario(Usuario usuario) {
        this.usuario = usuario;
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
