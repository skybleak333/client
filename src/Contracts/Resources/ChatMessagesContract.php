<?php

declare(strict_types=1);

namespace OpenAI\Contracts\Resources;

use OpenAI\Responses\Chat\ListMessagesResponse;

interface ChatMessagesContract
{
    /**
     * Lists the messages of a stored chat completion
     *
     * @see https://platform.openai.com/docs/api-reference/chat/getMessages
     *
     * @param  array<string, mixed>  $parameters
     */
    public function list(string $completionId, array $parameters = []): ListMessagesResponse;
}
