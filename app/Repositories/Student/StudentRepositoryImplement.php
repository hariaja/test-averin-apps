<?php

namespace App\Repositories\Student;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Student;

class StudentRepositoryImplement extends Eloquent implements StudentRepository
{
  /**
   * Model class to be used in this repository for the common methods inside Eloquent
   * Don't remove or change $this->model variable name
   * @property Model|mixed $model;
   */
  public function __construct(
    protected Student $model
  ) {
    # code...
  }

  /**
   * Base Query to call query() function in model
   */
  public function getQuery()
  {
    return $this->model->query();
  }

  /**
   * get data with condition or column by
   */
  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null)
  {
    $data = $this->model->select($columns);

    if (!empty($wheres)) {
      foreach ($wheres as $key => $value) {
        if (is_array($value)) {
          $data = $data->whereIn($key, $value);
        } else {
          $data = $data->where($key, $comparisons, $value);
        }
      }
    }

    if ($orderBy) {
      $data = $data->orderBy($orderBy, $orderByType);
    }

    return $data;
  }

  /**
   * Get Paginate
   *
   * @return Collection
   */
  public function getPaginate($columns = '*', $filter = [], $limit = 10)
  {
    $data = $this->model->select($columns);

    if (!empty($filter)) {
      foreach ($filter as $key => $value) {
        if (is_array($value)) {
          $data = $data->whereIn($key, $value);
        } else {
          $data = $data->where($key, $value);
        }
      }
    }

    return $data->paginate($limit);
  }
}
