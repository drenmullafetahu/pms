<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
class Files extends Model
{
    protected $fillable = ['id','posted_by', 'file_title', 'file_original_name', 'size', 'type'];

}