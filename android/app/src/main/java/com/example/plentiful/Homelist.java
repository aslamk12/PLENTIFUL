package com.example.plentiful;

public class Homelist {
    private int pid;
    private String pname,pimage;

    public Homelist(int pid, String pname, String pimage) {
        this.pid = pid;
        this.pname = pname;
        this.pimage = pimage;
    }

    public int getPid() {
        return pid;
    }

    public String getPname() {
        return pname;
    }

    public String getPimage() {
        return pimage;
    }
}
