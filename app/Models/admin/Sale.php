<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'ref',
        'customer_id',
        'note',
        'status',
        'order_date',
        'deliver_date',
        'created_by'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class,"customer_id");
    }

    public function sale_details(){
        return $this->hasMany(SaleDetalis::class);
    }

    public function sale_payment(){
       return $this->hasOne(SalePayment::class);
    }



    /**
     * ###########################################
     * #        Repository Methods Start         #
     * ###########################################
     * */
    protected static function boot(){
        parent::boot();

        static::creating(function ($query){
            $query->created_by = auth()->id();
        });
    }

    
    public static function getById($id, $relation=false){
        $query = self::query();

        ($relation ? $query->with(['customer','sale_details','sale_payment']) :$query) ;

        return $query->findOrFail($id);
    }


    public static function store($data){
//        dd($data);
       return self::create([
            'customer_id' => $data['customer_id'],
            'note' => $data['note'],
//            'status' => $data['status'] ?? '',
            'order_date' => $data['order_date'],
            'deliver_date' => $data['deliver_date'],
            'ref' =>$data['ref']
        ]);
    }
    public static function getAll($order_by = false){
        $query = self::query();
        return ($order_by ? $query->orderBy('id',$order_by) : $query )->with(['customer','sale_details','sale_payment'])->get();

    }

    public static function getSearcheData($data){

        Log::info("Incoming Payloads".json_encode($data));
        $from = $data['from']." 00:00:00";
        $to = $data['to']." 23:59:59";

        $query = Sale::query();
        ($data['customer_id'] ? $query->where('customer_id',$data['customer_id']) : $query);

        if (isset($from) && isset($to)){

            $query->whereBetween('created_at', [$from,$to]);

            info("Log From inside Isset IF {$from}, v{$to},");
            info("SQL Query:,".json_encode($query->toSql()));
            info("Query Binding:,".json_encode($query->getBindings()));

            return $query->get();

        }
        ($from ? $query->whereDate('created_at','<=' ,$from) : $query);

        return ($to ? $query->whereDate('created_at','>=' ,$to) : $query);
    }

    /**
     * ###########################################
     * #        Repository Methods END          #
     * ###########################################
     * */

}
