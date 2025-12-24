<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hsncode extends Model
{

  /**
   * @primaryKey string - primry key column.
   * @dateFormat string - date storage format
   * @guarded string - allow mass assignment except specified
   * @CREATED_AT string - creation date column
   * @UPDATED_AT string - updated date column
   */
  protected $table = 'hsncodes';
  protected $primaryKey = 'hsncode_id';
  protected $dateFormat = 'Y-m-d H:i:s';
  protected $guarded = ['hsncode_id'];
  const CREATED_AT = 'hsncode_created';
  const UPDATED_AT = 'hsncode_updated';

  public function creator()
  {
    return $this->belongsTo('App\Models\User', 'hsncode_creatorid', 'id');
  }
}
