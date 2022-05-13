//package com.daw2.proyectospringfinal.controller;
//
//
//import com.daw2.proyectospringfinal.components.FacturaComponent;
//import com.daw2.proyectospringfinal.model.entity.*;
//import com.daw2.proyectospringfinal.service.*;
//import org.springframework.beans.factory.annotation.Autowired;
//import org.springframework.security.core.context.SecurityContextHolder;
//import org.springframework.security.core.userdetails.UserDetails;
//import org.springframework.stereotype.Controller;
//import org.springframework.ui.Model;
//import org.springframework.validation.BindingResult;
//import org.springframework.web.bind.annotation.*;
//import org.springframework.web.servlet.mvc.support.RedirectAttributes;
//
//import javax.servlet.http.HttpServletRequest;
//import javax.validation.Valid;
//import java.util.ArrayList;
//
//@Controller
//@RequestMapping("/carrito")
//public class CarritoController {
//
//    @Autowired
//    private FacturasService facturasService;
//    @Autowired
//    private ClientesService clientesService;
//    @Autowired
//    private ArticulosService articulosService;
//
//    @Autowired
//    private CarritoService carritoService;
//
//    @Autowired
//    private DetalleCarritoService detalleCarritoService;
//
//    @PostMapping({"/add"})
//    public String addCarrito(@ModelAttribute("articuloCarrito") Articulo articulo, RedirectAttributes attributes) {
//
//        Object principal = SecurityContextHolder.getContext().getAuthentication().getPrincipal();
//
//        String username;
//
//        if (principal instanceof UserDetails) {
//            username = ((UserDetails)principal).getUsername();
//
//        } else {
//            username = principal.toString();
//        }
//
//        System.out.println(username);
//
//
//        articulo = articulosService.getByRef(articulo.getRef());
//
////        Carrito carritoActual = carritoService.notConfirm(Usuarios.usuarioActual);
////
////        if (carritoActual == null) {
////            carritoActual = new Carrito(Usuario.usuarioActual);
////            carritoService.save(carritoActual);
////        }
////        DetalleCarrito detalleCarrito = detalleCarritoService.findCarritoAndArticulo(carritoActual, articulo);
////
////        if (detalleCarrito == null) {
////            detalleCarrito = new DetalleCarrito(carritoActual, articulo);
////            detalleCarritoService.save(detalleCarrito);
////        } else {
////            detalleCarrito.setCantidad(detalleCarrito.getCantidad() + 1);
////            detalleCarritoService.save(detalleCarrito);
////        }
////
////        carritoActual.setTotal(carritoActual.getTotal() + articulo.getPrecio());
////        carritoService.save(carritoActual);
////
////        attributes.addFlashAttribute("correcto", true);
//
//        return "redirect:/tienda";
//    }
//
//}


