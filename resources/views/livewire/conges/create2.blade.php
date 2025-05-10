<div>
    @livewire('conges.create2')

    <h1>Demande de congé</h1>

    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message')}}</div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label>Type de congé:</label>
            <select wire:model="type" class="form-control">
                <option value="vacances">Vacances</option>
                <option value="maladie">Maladie</option>
                <option value="télétravail">Télétravail</option>
            </select>
        </div>

        <div class="form-group">
            <label>Date de début:</label>
            <input type="date" wire:model="date_debut" class="form-control">
        </div>

        <div class="form-group">
            <label>Date de fin:</label>
            <input type="date" wire:model="date_fin" class="form-control">
        </div>

        <div class="form-group">
            <label>Motif (optionnel):</label>
            <textarea wire:model="motif" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">
            <i class="fas fa-paper-plane"></i> Envoyer la demande
        </button>
    </form>
</div>
