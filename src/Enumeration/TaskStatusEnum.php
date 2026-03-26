<?php

namespace Mhakkou\LearningTracker\Enumeration;

enum TaskStatusEnum : string {
    case NOT_STARTED = 'not started';
    case IN_PROGRESS = 'in progress';
    case COMPLETED = 'completed';
}