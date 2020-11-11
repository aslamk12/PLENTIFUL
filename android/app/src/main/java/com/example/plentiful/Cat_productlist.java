package com.example.plentiful;

public class Cat_productlist {
    private int pid,price,stock;
    private String p_name,p_image,category,tfp,descp;

    public Cat_productlist(int pid, int price, int stock, String p_name, String p_image, String category, String tfp, String descp) {
        this.pid = pid;
        this.price = price;
        this.stock = stock;
        this.p_name = p_name;
        this.p_image = p_image;
        this.category = category;
        this.tfp = tfp;
        this.descp = descp;
    }

    public int getPid() {
        return pid;
    }

    public int getPrice() {
        return price;
    }

    public int getStock() {
        return stock;
    }

    public String getP_name() {
        return p_name;
    }

    public String getP_image() {
        return p_image;
    }

    public String getCategory() {
        return category;
    }

    public String getTfp() {
        return tfp;
    }

    public String getDescp() {
        return descp;
    }

    public Cat_productlist(int pid, String p_name, String p_image, int price) {
        this.pid = pid;
        this.price = price;
        this.p_name = p_name;
        this.p_image = p_image;
    }
}
