```php
interface TicketInterface {
	public load($ticketId);
	public save($ticket);
	public update($ticket);
	public delete($ticket)
}
```

## Класс-репозиторий для "внутренних" билетов:

```php
class TicketRepository implements TicketRepository {

	public function load($ticketID) {
		return Ticket::find()->where(['id' => $ticketId])->one(); 
	}
	
	public function save($ticket){/*...*/} 
	public function update($ticket){/*...*/} 
	public function delete($ticket){/*...*/}
}

```

## Класс для билетов стороннего поставщика

```php
class RemoteTicketRepository implements TicketRepository {
	
	public funtion load($ticketId) {
		$remoteTicket = $remoteSource->getById($id);

		return Ticket($remoteTicket->getTitle, $remoteTicket->getDate(), ...)
	}

	public function save($ticket) {}

	public function update($ticket) {}
	public function delete($ticket) {}
}

```

## Класс-сервис для работы с билетами

Сервис работает сразу с двумя репозиториями. У локального репозитория приоритет.
Методы `load(), update(), delete()` сначала определяют, к какому репозитория относится конкретная сущность `Ticket`. 
Метод `getTickets()` возвращает общий массив "локальных" билетов и тех, что на другом сервере.


```php

class TicketService {
    
	private TicketRepository $localRepo;
    private RemoteTicketRepository $remoteRepo;

    public function __construct(TicketRepository $localRepo, RemoteTicketRepository $remoteRepo) {
        $this->localRepo = $localRepo;
        $this->remoteRepo = $remoteRepo;
    }

    public function load(int $ticketId): ?Ticket 
	{
        $ticket = $this->localRepo->load($ticketId);
        if (!$ticket) {
            $ticket = $this->remoteRepo->load($ticketId);
        }
        return $ticket;
    }

    public function save(Ticket $ticket): bool 
	{
        if ($ticket->getId()) {
            return $this->update($ticket);
        }
        return $this->localRepo->save($ticket);
    }

    public function update(Ticket $ticket): bool 
	{
        if ($this->localRepo->ticketExists($ticket)) {
            return $this->localRepo->update($ticket);
        }
        return $this->remoteRepo->update($ticket);
    }

    public function delete(Ticket $ticket): bool {
        if ($this->localRepo->ticketExists($ticket)) {
            return $this->localRepo->delete($ticket);
        }
        return $this->remoteRepo->delete($ticket);
    }

    public function getTickets(): array {
        $localTickets = $this->localRepo->getTickets();
        $remoteTickets = $this->remoteRepo->getTickets();

        return array_merge($localTickets, $remoteTickets);
    }
}


```