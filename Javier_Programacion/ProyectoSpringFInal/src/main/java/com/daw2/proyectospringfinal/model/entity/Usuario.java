package com.daw2.proyectospringfinal.model.entity;

import org.springframework.format.annotation.DateTimeFormat;

import javax.persistence.*;
import javax.validation.constraints.Email;
import javax.validation.constraints.NotBlank;
import java.util.Date;
import java.util.List;


@Entity
    @Table(name="usuarios")
    public class Usuario {
        @Id
        @GeneratedValue(strategy = GenerationType.AUTO)
        private Integer id;
        @Column(unique = true,nullable = false,length = 12)
        private String nif;
        @NotBlank
        @Column(nullable = false,length = 20)
        private String nombre;
        @NotBlank
        @Column(nullable = false,length = 20)
        private String apellido1;
        @Column(length = 20)
        private String apellido2;
        @Column(length = 15)
        private String telefono;
        @NotBlank
        @Email
        @Column(length = 75)
        private String email;
        @Column(name = "create_at", nullable = false)
        @DateTimeFormat(pattern = "yyyy-MM-dd")
        @Temporal(TemporalType.TIMESTAMP)
        private Date createAt;
        private boolean activo;
        private List<Rol> roles;


        @PrePersist
        public void init() {
            createAt = new Date();
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

        public String getEmail() {
            return email;
        }

        public void setEmail(String email) {
            this.email = email;
        }

        public Date getCreateAt() {
            return createAt;
        }

        public void setCreateAt(Date createAt) {
            this.createAt = createAt;
        }

    }


