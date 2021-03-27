<?php

namespace App\UseCases\Flags;

use Illuminate\Support\Facades\DB;
use App\Models\Flag;
use App\Http\Requests\UpdateFlagRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;

class UpdateFlagUseCase
{
    public function __invoke(Flag $flag, UpdateFlagRequest $request): Flag
    {
        try {
            DB::beginTransaction();

            $flag->update($request->except('color_hex'));
            if ($request->has('color_hex')) {
                $flag->tracker->update($request->only('color_hex'));
            }

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new BadRequestHttpException($exception->getMessage());
        }

        return $flag->refresh();
    }
}
