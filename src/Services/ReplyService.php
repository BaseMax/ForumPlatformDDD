<?php

namespace App\Services;

use App\Models\Reply;
use App\Repositories\ReplyRepository;

class ReplyService extends Service
{
    public function all(int $thread_id): array
    {
        return (new ReplyRepository())->all($thread_id);
    }

    public function get(int $thread_id, int $id): array
    {
        return (new ReplyRepository())->get($thread_id, $id);
    }

    public function add(int $user_id, int $thread_id, string $body, int $upvotes, int $downvotes): int
    {
        $reply = Reply::createNewReply($user_id, $thread_id, $body, $upvotes, $downvotes);

        $replyId = (new ReplyRepository())->add($reply);

        return $replyId;
    }

    public function update(int $id, int $thread_id, array $values): array
    {
        (new ReplyRepository())->update($id, $thread_id, $values);

        return $this->get($thread_id, $id);
    }

    public function delete(int $id, int $thread_id): void
    {
        (new ReplyRepository())->delete($id, $thread_id);
    }
}
