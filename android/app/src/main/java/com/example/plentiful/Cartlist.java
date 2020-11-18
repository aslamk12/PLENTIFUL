package com.example.plentiful;

public class Cartlist {
    private int cart_id,pid,bid,price,qty,total;
    private String p_name,p_image;

    public Cartlist(int cart_id, int pid, int bid, int price, int qty, int total, String p_name, String p_image) {
        this.cart_id = cart_id;
        this.pid = pid;
        this.bid = bid;
        this.price = price;
        this.qty = qty;
        this.total = total;
        this.p_name = p_name;
        this.p_image = p_image;
    }

    public Cartlist( int price, int qty, String p_name, String p_image) {
        //this.pid = pid;
        //this.bid = bid;
        this.price = price;
        this.qty = qty;
        //this.total = total;
        this.p_name = p_name;
        this.p_image = p_image;
    }

    public int getCart_id() {
        return cart_id;
    }

    public int getPid() {
        return pid;
    }

    public int getBid() {
        return bid;
    }

    public int getPrice() {
        return price;
    }

    public int getQty() {
        return qty;
    }

    public int getTotal() {
        return total;
    }

    public String getP_name() {
        return p_name;
    }

    public String getP_image() {
        return p_image;
    }
}
