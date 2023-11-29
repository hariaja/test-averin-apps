<?php

namespace App\Services\Student;

use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;

class StudentServiceImplement extends Service implements StudentService
{
  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  public function __construct(
    protected StudentRepository $mainRepository
  ) {
    # code...
  }

  public function getQuery()
  {
    try {
      DB::beginTransaction();
      return $this->mainRepository->getQuery();
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException('Unable to perform action, please check your logs');
    }
  }

  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null)
  {
    try {
      DB::beginTransaction();
      return $this->mainRepository->getWhere(
        wheres: $wheres,
        columns: $columns,
        comparisons: $comparisons,
        orderBy: $orderBy,
        orderByType: $orderByType
      );
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException('Unable to perform action, please check your logs');
    }
  }

  public function getPaginate($columns = '*', $filter = [], $limit = 10)
  {
    try {
      DB::beginTransaction();
      return $this->mainRepository->getPaginate(
        columns: $columns,
        filter: $filter,
        limit: $limit
      );
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException('Unable to perform action, please check your logs');
    }
  }

  /**
   * Handle Adding data to database.
   */
  public function handleStoreData($request)
  {
    try {
      DB::beginTransaction();

      $payload = $request->validated();
      $this->mainRepository->create($payload);

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException('Unable to perform action, please check your logs');
    }
  }

  /**
   * Handle Update data to database.
   */
  public function handleUpdateData($request, $id)
  {
    try {
      DB::beginTransaction();

      $payload = $request->validated();
      $this->mainRepository->update($id, $payload);

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException('Unable to perform action, please check your logs');
    }
  }
}
