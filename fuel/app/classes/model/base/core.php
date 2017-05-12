<?php

use Fuel\Core\DB;
use Fuel\Core\Log;

class Model_Base_Core
{
    public static function getRowNum($modelName, $arrQuery = [])
    {
        try {
            //declare
            $query = DB::select(DB::expr('count(id) as total'));
            $query->from($modelName);
            if (!empty($arrQuery['where'])) {
                $query->where($arrQuery['where']);
            }
            $results = $query->execute()->as_array();
            return !empty($results[0]['total'])? $results[0]['total']: 0;
        } catch (Exception $e) {
            Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
        }
        return false;
    }

      // public static function insert($modelName, $arrData)
      // {
      //     try {
      //         $new = $modelName::forge($arrData);
      //         $new->save();
      //         return $new->id;
      //     } catch (Exception $e) {
      //       var_dump($e->getMessage());die;
      //         Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
      //     }
      //     return false;
      // }

    public static function insertAll($modelName, $arrData)
    {
        try {
            $query = DB::insert($modelName);
            $query->set($arrData);
            $result = $query->execute();
            if($result)
              return $result;
            return false;
        } catch (Exception $e) {
            var_dump($e->getMessage());die;
            Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
        }
        return false;
    }

    // public static function update($modelName, $id, $arrData)
    // {
    //     try {
    //         $query = $modelName::find($id);
    //         $query->set($arrData);
    //         $query->save();
    //         return true;
    //     } catch (Exception $e) {
    //         Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
    //     }
    //     return false;
    // }

    public static function updateByWhere($modelName, $arrWhere, $arrData)
    {
        try {
            DB::update($modelName)
                ->set($arrData)
                ->where($arrWhere)
                ->execute();
            return true;
        } catch (Exception $e) {
            Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
        }
        return false;
    }

    // public static function delete($modelName, $id)
    // {
    //     try {
    //         $item = $modelName::find($id);
    //         if ($item) {
    //             $item->del_flg = 1;
    //             $item->save();
    //         }
    //         return true;
    //     } catch (Exception $e) {
    //         Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
    //     }
    //     return false;
    // }

    // public static function deleteByWhere($modelName, $arrWhere)
    // {
    //     try {
    //         $arrResult = $modelName::find('all', [
    //                 'where' => $arrWhere
    //         ]);
    //         if (!empty($arrResult)) {
    //             foreach ($arrResult as $item) {
    //                 $item->del_flg = 1;
    //                 $item->save();
    //             }
    //         }
    //         return true;
    //     } catch (Exception $e) {
    //         Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
    //     }
    //     return false;
    // }

    // public static function deleteRow($modelName, $id)
    // {
    //     try {
    //         $modelName::find($id)->delete();
    //         return true;
    //     } catch (Exception $e) {
    //         Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
    //     }
    //     return false;
    // }

    public static function deleteRowByWhere($modelName, $arrWhere)
    {
        try {
            DB::delete($modelName)->where($arrWhere)->execute();
            return true;
        } catch (Exception $e) {
            Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
        }
        return false;
    }

    public static function getOne($modelName, $arrQuery = [], Closure $callBack = null)
    {
        try {
            if (!empty($arrQuery['select'])) {
                $query->select($arrQuery['select']);
            } else {
                $query = DB::select();
            }
            $query->from($modelName);
            if (!empty($arrQuery['from_cache'])) {
                $query->from_cache(false);
            }
            if (!empty($arrQuery['where'])) {
                $query->where($arrQuery['where']);
            }
            if (!empty($arrQuery['order_by'])) {
                $query->order_by($arrQuery['order_by']);
            }
            if (!empty($arrQuery['offset'])) {
                $query->offset($arrQuery['offset']);
            }
            if (!is_null($callBack)) {
                $query = $callBack($query);
            }
            $data = $query->execute()->as_array();
            return empty($data) ? null : $data[0];
        } catch (Exception $e) {
            Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
        }
        return false;
    }

    public static function getAll($modelName, $arrQuery = [], Closure $callBack = null)
    {
        try {
            //declare
            if (!empty($arrQuery['select'])) {
                $query = DB::select_array($arrQuery['select']);
            } else {
                $query = DB::select();
            }

            $query->from($modelName);

            if (!empty($arrQuery['from_cache'])) {
                $query->from_cache(false);
            }
            if (!empty($arrQuery['where'])) {
                $query->where($arrQuery['where']);
            }
            if (!empty($arrQuery['order_by'])) {
                foreach ($arrQuery['order_by'] as $k => $v) {
                    $query->order_by($k, $v);
                }
            }
            if (!empty($arrQuery['limit'])) {
                $query->limit($arrQuery['limit']);
            }
            if (!empty($arrQuery['offset'])) {
                $query->offset($arrQuery['offset']);
            }
            if (!is_null($callBack)) {
                $query = $callBack($query);
            }
            $results = $query->execute()->as_array();
            // echo "<pre>";print_r($results);echo "</pre>";
            // echo $query->compile();die;
            return $results;
        } catch (Exception $e) {
            Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
        }
        return false;
    }

    // public static function findAll($modelName, $arrQuery = [])
    // {
    //     try {
    //         $query = $modelName::find('all', [
    //                 'select' => empty($arrQuery['select']) ? [] : $arrQuery['select'],
    //                 'where' => empty($arrQuery['where']) ? [] : $arrQuery['where'],
    //                 'order_by' => empty($arrQuery['order_by']) ? [] : $arrQuery['order_by'],
    //                 'limit' => empty($arrQuery['limit']) ? _DEFAULT_LIMIT_ : $arrQuery['limit'],
    //                 'offset' => empty($arrQuery['offset']) ? _DEFAULT_OFFSET_ : $arrQuery['offset'],
    //         ]);
    //         return Model_Service_Util::convertToArray($query);
    //     } catch (Exception $e) {
    //         Log::write('ERROR', $e->getMessage(), __CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine());
    //     }
    //     return false;
    // }

}
