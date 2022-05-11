
/*
package com.daw2.proyectospringfinal.controller;

import com.daw2.proyectospringfinal.components.FacturaComponent;
import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.entity.Factura;
import com.daw2.proyectospringfinal.service.ArticulosService;
import com.daw2.proyectospringfinal.service.ClientesService;
import com.daw2.proyectospringfinal.service.FacturasService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.servlet.http.HttpServletRequest;
import javax.validation.Valid;
import java.util.ArrayList;

@Controller
@RequestMapping("/carrito")
public class CarritoController {

    @Autowired
    private FacturasService facturasService;
    @Autowired
    private ClientesService clientesService;
    @Autowired
    private ArticulosService articulosService;
    @Autowired
    private FacturaComponent facturaComponent;



    @PostMapping(value = "/add")
    public String agregarAlCarrito(@ModelAttribute Articulo articulo, HttpServletRequest request, RedirectAttributes redirectAttrs) {

       // ArrayList<Articulo> carrito = this.obtenerCarrito(request);

        Articulo articulo1 = articulosService.getByRef(articulo.getRef());

        boolean encontrado = false;
        for (articulo1 productoParaVenderActual : carrito) {
            if (productoParaVenderActual.getCodigo().equals(productoBuscadoPorCodigo.getCodigo())) {
                productoParaVenderActual.aumentarCantidad();
                encontrado = true;
                break;
            }
        }
        if (!encontrado) {
            carrito.add(new ProductoParaVender(productoBuscadoPorCodigo.getNombre(), productoBuscadoPorCodigo.getCodigo(), productoBuscadoPorCodigo.getPrecio(), productoBuscadoPorCodigo.getExistencia(), productoBuscadoPorCodigo.getId(), 1f));
        }
        this.guardarCarrito(carrito, request);
        return "redirect:/vender/";
    }

} */
