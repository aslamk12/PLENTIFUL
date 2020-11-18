package com.example.plentiful;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
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

import java.util.List;

public class CartlistAdapter extends RecyclerView.Adapter<CartlistAdapter.CartlistViewHolder> {
    private Context mCtx;
    private List<Cartlist> cartlists;

    public CartlistAdapter(Context mCtx, List<Cartlist> cartlists) {
        this.mCtx = mCtx;
        this.cartlists = cartlists;
    }
    @NonNull
    @Override
    public CartlistAdapter.CartlistViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.cart_list, null);

        return new CartlistAdapter.CartlistViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull CartlistAdapter.CartlistViewHolder holder, int position) {

        Cartlist cartlist = cartlists.get(position);
        Glide.with(mCtx)
                .load(cartlist.getP_image())
                .into(holder.imageView);

        holder.tv_cartpname.setText(cartlist.getP_name());
        holder.tv_price.setText(String.valueOf(cartlist.getPrice()));
        //holder.tv_total.setText(String.valueOf(cartlist.getTotal()));

    }

    @Override
    public int getItemCount() {
        return cartlists.size();
    }

    class CartlistViewHolder extends RecyclerView.ViewHolder{

        private final Context context;
        TextView tv_cartpname, tv_price, tv_total;
        ImageView imageView;

        public CartlistViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            imageView = itemView.findViewById(R.id.iv_cartproduct);
            tv_cartpname = itemView.findViewById(R.id.tv_cartproduct_name);
            tv_price = itemView.findViewById(R.id.tv_cartproduct_price);


        }
    }
}

