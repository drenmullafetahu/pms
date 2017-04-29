<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
class CoverImages extends Model
{
    protected $fillable = ['id','user_id','file_original_name', 'file_size', 'file_type', 'size', 'type'];

}