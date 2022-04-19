package com.daw2.aprende.util;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class UtilFecha {
    public static char separatorDefault = '-';

    public static Date yyyy_mm_dd_toDate(String date, char... separator) {
        char sep = (separator != null && separator.length > 0) ? sep = separator[0] : separatorDefault;
        Date fecha = null;
        try {
            fecha = new SimpleDateFormat("yyyy" + sep + "MM" + sep + "dd").parse(date);
        } catch (ParseException e) {
        }
        return fecha;
    }

    public static Date dd_mm_yyyy_toDate(String date, char... separator) {
        char sep = (separator != null && separator.length > 0) ? sep = separator[0] : separatorDefault;
        Date fecha = null;
        try {
            fecha = new SimpleDateFormat("dd" + sep + "MM" + sep + "yyyy").parse(date);
        } catch (ParseException e) {
        }
        return fecha;
    }

    public static String dateTo_yyyy_mm_dd(Date date, char... separator) {
        char sep = (separator != null && separator.length > 0) ? sep = separator[0] : separatorDefault;
        String fecha = new SimpleDateFormat("yyyy" + sep + "MM" + sep + "dd").format(date);
        return fecha;
    }

    public static String dateTo_dd_mm_yyyy(Date date, char... separator) {
        char sep = (separator != null && separator.length > 0) ? sep = separator[0] : separatorDefault;
        String fecha = new SimpleDateFormat("dd" + sep + "MM" + sep + "yyyy").format(date);
        return fecha;
    }

}
