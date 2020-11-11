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

public class CatlistAdapter extends RecyclerView.Adapter<CatlistAdapter.CatViewHolder>{

    private Context mCtx;
    private List<Catlist> catlists;

    public CatlistAdapter(Context mCtx, List<Catlist> catlists) {
        this.mCtx = mCtx;
        this.catlists = catlists;
    }
    @NonNull
    @Override
    public CatViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.category_list, null );

        return new CatViewHolder(view);
    }
    @Override
    public void onBindViewHolder(@NonNull CatViewHolder holder, int position) {

        Catlist catlist = catlists.get(position);
        Glide.with(mCtx)
                .load(catlist.getCat_image())
                .into(holder.imageView);

        holder.tv_catname.setText(catlist.getCat_name());

    }
    @Override
    public int getItemCount() {
        return catlists.size();
    }
    class CatViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        private final Context context;
        TextView tv_catname;
        ImageView imageView;

        public CatViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            itemView.setOnClickListener(this);
            imageView = itemView.findViewById(R.id.imageView);
            tv_catname = itemView.findViewById(R.id.tv_catname);
        }

        @Override
        public void onClick(View v) {

            Intent intent = new Intent();

            for (int i = 0; i < getItemCount(); i++) {
                if (v == itemView) {
                    intent = new Intent(context, Category_product.class);
                    intent.putExtra("category_name", catlists.get(getLayoutPosition()).getCat_name());
                    context.startActivity(intent);
                    break;
                }
            }
        }
    }


}
