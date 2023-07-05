<?php

namespace App\Services;
use App\Repositories\ReplyRepository;

class ReplyService extends Service
{
    public function all(int $thread_id): array
    {
        return (new ReplyRepository())->all($thread_id);
    }
}