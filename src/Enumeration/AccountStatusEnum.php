<?php

namespace Mhakkou\LearningTracker\Enumeration;

enum AccountStatusEnum : string {
    case ACTIVE = 'active';
    case BLOCKED = 'blocked';
    case DELETED = 'deleted';
}