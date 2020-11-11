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

public class Cat_productlistAdapter extends RecyclerView.Adapter<Cat_productlistAdapter.CatproductViewHolder>{

    private Context mCtx;
    private List<Cat_productlist> cat_productlists;

    public Cat_productlistAdapter(Context mCtx, List<Cat_productlist> cat_productlists) {
        this.mCtx = mCtx;
        this.cat_productlists = cat_productlists;
    }
    @NonNull
    @Override
    public CatproductViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.category_productlist, null );

        return new CatproductViewHolder(view);
    }
    @Override
    public void onBindViewHolder(@NonNull CatproductViewHolder holder, int position) {

        Cat_productlist cat_productlist = cat_productlists.get(position);
        Glide.with(mCtx)
                .load(cat_productlist.getP_image())
                .into(holder.imageView);

        holder.tv_catpname.setText(cat_productlist.getP_name());
        holder.tv_price.setText(String.valueOf(cat_productlist.getPrice()));

    }
    @Override
    public int getItemCount() {
        return cat_productlists.size();
    }
    class CatproductViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        private final Context context;
        TextView tv_catpname,tv_price;
        ImageView imageView;

        public CatproductViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            itemView.setOnClickListener(this);
            imageView = itemView.findViewById(R.id.iv_catproduct);
            tv_catpname = itemView.findViewById(R.id.tv_catproduct_name);
            tv_price = itemView.findViewById(R.id.tv_catproduct_price);
        }

        @Override
        public void onClick(View v) {

            Intent intent = new Intent();

            for (int i = 0; i < getItemCount(); i++) {
                if (v == itemView) {
                    intent = new Intent(context, Product_Details.class);
                    intent.putExtra("product_id", cat_productlists.get(getLayoutPosition()).getPid());
                    intent.putExtra("product_name", cat_productlists.get(getLayoutPosition()).getP_name());
                    context.startActivity(intent);
                    break;
                }
            }
        }
    }


}
