package com.example.plentiful;

import android.content.Context;
import android.os.AsyncTask;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.ProgressBar;
import android.widget.Toast;
import android.content.Context;
import android.content.Intent;
import android.view.ContextMenu;
import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;


import com.bumptech.glide.Glide;

import org.json.JSONException;
import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Locale;


public class MyorderlistAdapter extends RecyclerView.Adapter<com.example.plentiful.MyorderlistAdapter.MyorderViewHolder> {
        private Context mCtx;
        private List<Myorderlist> myorderlists;


        public MyorderlistAdapter(Context mCtx, List<Myorderlist> myorderlists) {
            this.mCtx = mCtx;
            this.myorderlists = myorderlists;
        }
       String date = new SimpleDateFormat("dd-MM-yyyy", Locale.getDefault()).format(new Date());


    @NonNull
        @Override
        public MyorderlistAdapter.MyorderViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

            LayoutInflater inflater = LayoutInflater.from(mCtx);
            View view = inflater.inflate(R.layout.myorder_list, null);

            return new MyorderlistAdapter.MyorderViewHolder(view);
        }

        @Override
        public void onBindViewHolder(@NonNull MyorderlistAdapter.MyorderViewHolder holder, int position) {

            Myorderlist myorderlist = myorderlists.get(position);
            Glide.with(mCtx)
                    .load(myorderlist.getP_image())
                    .into(holder.imageView);

            holder.tv_orderpname.setText(myorderlist.getP_name());
            holder.tv_orderprice.setText("Rs."+(myorderlist.getPrice()));
            holder.tv_orderquantity.setText("Qty:"+(myorderlist.getQty()));
            holder.tv_delcharge.setText("Rs."+(myorderlist.getDelcharge()));
            holder.tv_total.setText("Rs."+myorderlist.getTotal());
            holder.tv_est.setText("Estimated delivery date: "+ date);


        }

        @Override
        public int getItemCount() {
            return myorderlists.size();
        }

        class MyorderViewHolder extends RecyclerView.ViewHolder {

            private final Context context;
            TextView tv_orderpname, tv_orderprice,tv_orderquantity,tv_delcharge,tv_total,tv_est;
            ImageView imageView;

            public MyorderViewHolder(View itemView) {
                super(itemView);

                context = itemView.getContext();
                imageView = itemView.findViewById(R.id.iv_orderproduct);
                tv_orderpname = itemView.findViewById(R.id.tv_orderproduct_name);
                tv_orderprice = itemView.findViewById(R.id.tv_orderproduct_price);
                tv_orderquantity=itemView.findViewById(R.id.tv_order_quantity);
                tv_delcharge=itemView.findViewById(R.id.tv_odelcharge);
                tv_total=itemView.findViewById(R.id.tv_myordertotal);
                tv_est =itemView.findViewById(R.id.tv_odeldate);


            }
        }
    }
