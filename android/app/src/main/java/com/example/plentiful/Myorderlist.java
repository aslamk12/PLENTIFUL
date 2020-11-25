package com.example.plentiful;

public class Myorderlist {
    private int oi_id,order_id,pid,bid,price,qty,total,delcharge;
    private String p_name,p_image;

    public Myorderlist(int oi_id, int order_id, int pid, int bid, int price, int qty, int total, int delcharge, String p_name, String p_image) {
        this.oi_id = oi_id;
        this.order_id = order_id;
        this.pid = pid;
        this.bid = bid;
        this.price = price;
        this.qty = qty;
        this.total = total;
        this.delcharge = delcharge;
        this.p_name = p_name;
        this.p_image = p_image;
    }

    public Myorderlist(int oi_id, int price, int qty, int total, int delcharge, String p_name, String p_image) {
        this.oi_id = oi_id;
        this.price = price;
        this.qty = qty;
        this.total = total;
        this.delcharge = delcharge;
        this.p_name = p_name;
        this.p_image = p_image;
    }

    public int getOi_id() {
        return oi_id;
    }

    public int getOrder_id() {
        return order_id;
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

    public int getDelcharge() {
        return delcharge;
    }

    public String getP_name() {
        return p_name;
    }

    public String getP_image() {
        return p_image;
    }
}
