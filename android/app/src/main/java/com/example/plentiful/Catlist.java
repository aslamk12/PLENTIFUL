package com.example.plentiful;

public class Catlist {
    private int cid;
    private String cat_name,cat_image;

    public Catlist(int cid, String cat_name, String cat_image) {
        this.cid = cid;
        this.cat_name = cat_name;
        this.cat_image = cat_image;
    }

    public int getCid() {
        return cid;
    }

    public String getCat_name() {
        return cat_name;
    }

    public String getCat_image() {
        return cat_image;
    }
}
