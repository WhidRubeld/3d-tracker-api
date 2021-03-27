<?php

namespace App\UseCases\Flags;

use Illuminate\Support\Facades\DB;
use App\Models\Flag;
use App\Models\Tracker;
use App\Http\Requests\CreateFlagRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;

class CreateFlagUseCase
{
    public function __invoke(CreateFlagRequest $request): Flag
    {
        try {
            DB::beginTransaction();
            $tracker = Tracker::create($request->only('color_hex'));

            $flag = Flag::create(array_merge(
                $request->except('color_hex'),
                ['tracker_id' => $tracker->id],
            ));

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new BadRequestHttpException($exception->getMessage());
        }

        return $flag;
    }
}
